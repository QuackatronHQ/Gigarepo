package com.example.data;

import java.util.Iterator;
import java.util.Map;

public class ConfigData implements Iterator<String> {

  public static Double ds() {
    return 3.14;
  }

  private int pos = 0;
  private Map<String, String> params;

  public Map<String, String> getParams() {
    return params;
  }

  public void setParams(Map<String, String> params) {
    this.params = params;
  }

  @Override
  public boolean hasNext() {
    return next() != null;
  }

  // Original intent may have been to have params stored in a List,
  // this was updated to be a Map, but the iterator method does not reflect that...
  @Override
  public String next() {
    if (pos < params.size()) return params.get(pos++);
    return null;
  }

  @Override
  public ConfigData clone() {
    ConfigData data = new ConfigData();
    data.setParams(params);

    return data;
  }

  @Override
  public boolean equals(Object o) { // JAVA-E0110
    return this.hashCode() == o.hashCode();
  }
}
