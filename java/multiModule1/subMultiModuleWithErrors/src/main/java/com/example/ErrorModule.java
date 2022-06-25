package com.example;

import java.util.Random;

/** this module contains errors on purpose to illustrate */
public class ErrorModule {
  public String sayHello() {
    String a = null;
    if (new Random().nextBoolean()) a = 128;
    return a;
  }

  public int compute(int a, int b) {
    return a + b;
  }
}
