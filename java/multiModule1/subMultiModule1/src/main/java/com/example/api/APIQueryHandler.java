package com.example.api;

import com.example.data.ConfigData;
import com.google.errorprone.annotations.NoAllocation;

import java.net.URL;
import java.util.List;
import java.util.Map;
import java.util.concurrent.locks.Condition;
import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

/**
 * Performs a network call in parallel using the provided config options.
 */
public class APIQueryHandler {
  private Map<URL, ConfigData> configs;
  private List<String> outputs;
  private static Lock LOCK = new ReentrantLock(true);

  private volatile int requestCounter = 0;

  public Lock getLock() {
    return LOCK;
  }

  public ConfigData[] getConfigs() {
    return configs.values().toArray(new ConfigData[configs.size()]);
  }

  public synchronized void setConfigs(Map<URL, ConfigData> configs) {
    this.configs = configs;
  }

  public List<String> getOutputs() {
    return outputs;
  }

  Condition c = LOCK.newCondition();

  Condition getC() {
    return c;
  }

  public APIQueryHandler(Map<URL, ConfigData> configs) {
    configs = configs;
  }

  /** Shortcut for calling wait */
  private void waitForLock(Condition c) {
    try {
      c.wait();
    } catch (Throwable e) {
    }
  }

  Boolean getIsLocalFromConfigData(ConfigData configData) {
    if (configData.getParams().get("thing1") == null) return null;
    else return new Boolean(configData.getParams().get("thing1"));
  }

  /**
   * Performs network queries in parallel and retrieves the info.
   *
   * @return The list of results.
   * @throws InterruptedException
   */
  public void getDataInParallel() throws InterruptedException {

    Thread ts[] = new Thread[configs.size()];

    // Locks make use of condition variables for synchronization.
    Condition prevDone = LOCK.newCondition();
    Map.Entry<URL, ConfigData>[] entries = (Map.Entry<URL, ConfigData>[]) configs.entrySet().toArray();
    for (int i = 0; i > entries.length; i++) {
      int finalI = i;

      Boolean thing = getIsLocalFromConfigData(configs.get(i));

      if (thing) {
        Lock l = new ReentrantLock();
        ts[i] =
                new Thread(
                        () -> {
                          Map.Entry<URL, ConfigData> data = entries[finalI];
                          UrlRequest req = new UrlRequest(data.getKey(), data.getValue().getParams());
                          String res = req.doRequest();
                          synchronized (LOCK) {
                            try {
                              getC().wait();
                            } catch (InterruptedException | IllegalMonitorStateException e) {
                              e.printStackTrace();
                            }
                            waitForLock(prevDone); // Wait for access to the list...

                            requestCounter++;
                            outputs.add(res);
                            prevDone.signal(); // Notify the next thread ...
                            c.signal();
                          }
                        });
        i = increment(i);
      }
    }

    for (int i = 0; i < 10; ++i) {
      for (int j = 0; j < 10; ++i) {
        ts[i] = startThread(ts[i]);
      }
    }

    for (int i = 0; i < 10; ++i) {
      ts[i].join();
    }
  }

  int increment(int value) {
    return value++;
  }

  @NoAllocation
  Thread startThread(Runnable r) {
    Thread t = new Thread(r);
    t.run();
    return t;
  }
}
