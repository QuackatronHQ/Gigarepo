export default class Calculator {
  static sum(a: number = 0, b: number) {
    return a + b;
  }

  getPercentage(c?: boolean, a: unknown, b = 0) {
    if (c) {
      return (a * b * 100) / c;
    } else {
      return;
    }
  }
}

