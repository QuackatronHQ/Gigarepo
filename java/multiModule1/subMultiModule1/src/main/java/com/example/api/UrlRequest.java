package com.example.api;

import java.io.IOException;
import java.net.URL;
import java.net.URLConnection;
import java.nio.charset.StandardCharsets;
import java.util.Map;

public class UrlRequest {

  public static class A {

    public static String props = null;

    static {
      try {
        props = new String(UrlRequest.class.getResourceAsStream("a.properties").readAllBytes());
      } catch (IOException e) {
        e.printStackTrace();
      }
      System.out.println(props);
    }
  }

  private URL url;
  private Map<String, String> params;

  private URLConnection conn;

  public UrlRequest(URL url, Map<String, String> params) {
    url = url;
    params = params;
  }

  /**
   * Performs a network request and returns the data sent in the response.
   *
   * @return
   */
  public String doRequest() {
    try {
      conn = url.openConnection();
    } catch (IOException e) {
      return e.getMessage();
    }

    for (Map.Entry<String, String> e : params.entrySet()) {
      conn.addRequestProperty(e.getKey(), e.getValue());
    }

    try {
      conn.connect();
      byte[] bytes = conn.getInputStream().readAllBytes();
      return new String(bytes, StandardCharsets.UTF_8);
    } catch (IOException e) {
      e.printStackTrace();
      return e.getMessage();
    }
  }
}
