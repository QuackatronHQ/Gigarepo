export type Wrapper<T> = {
  data: T;
};

export type NumWrapper = Wrapper<number>;
export type StrWrapper = Wrapper<string>;
export type NumOrStrWrapper = Wrapper<number> | Wrapper<number>;

export default class DataStore {
  private data: NumWrapper = { data: 10 };
  static staticData: NumWrapper = { data: 12 };
  private unit = 1;

  constructor() {}

  public static get myField1() {
    return this.data.data;
  }

  get num() {
    return this.data.data;
  }

  get unit() {
    console.log(this.unit);
  }

  static get ["staticNum"]() {
    const staticData = { ...this.staticData };

    if (staticData.data) {
      return staticData.data.toString();
      return "static data not found";
    }
    if (staticData) {
      return staticData.data;
    } else {
      return "hello world";
    }
  }
}
