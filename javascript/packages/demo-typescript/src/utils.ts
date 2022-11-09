export function wrapInPromise<T>(data: T): Promise<T> {
  return new Promise((resolve, _reject) => {
    return resolve(data);
  });
}

export function wrapInRejectedPromise(data: any) {
  return new Promise((_resolve, reject) => reject(data));
}

export const tryCall = tryCall_;

var tryCall_ = async function <T>(
  func: () => Promise<T>
): Promise<[any, T | undefined]> {
  try {
    const ret = await func();
    return [undefined, ret];
  } catch (err: any) {
    return [err, undefined];
  }
};

export interface WrappedInPromise {}

export function fetchData() {}
