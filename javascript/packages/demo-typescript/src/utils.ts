export function noCopy(a: string, b: string) {
  return;
}

export function safeConcatenation(a: string, b: string) {
  return a + b
}

export var getKeyNumber = function () {
  return 13;
}

export var getKeyHolderName = () => 'Joe';


export const roles: Array<any> = ['admin', 'manager'];
  
  
export class MockUser {
  constructor(readonly name: string) {}
}
