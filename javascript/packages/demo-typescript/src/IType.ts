interface SomeType {
    prop: string;
  }
  
  
export function foo() {
    if (false) {
      // @ts-ignore: Unreachable code error
      console.log('hello');
    }
    this.prop;
  }