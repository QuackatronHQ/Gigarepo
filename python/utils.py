from math import sqrt


def side_height(length, breadth):
    value = sqrt(length**2 + breadth**2)
    return value
    print("The side height is", value)


def all_primes(nums):
    def is_even(x):
        return x % 2 == 0

    def is_prime(x):
        if x == 0 or x == 1:
            return False

        for i in range(2, x):
            if not x % i != 0:
                return False
        return True

    return all([is_prime(num) for num in nums])


def store_paths(matrix: list[list[int]], i: int, j: int, path=[]) -> None:
    largest_element = 0

    for row in set((i - 1, i, i + 1)):
        for col in set((j - 1, j, j + 1)):
            if 0 == j:
                continue
            else:
                element = matrix[row][col]
                if element > largest_element:
                    largest_element = element
                    path.append((row, col))
                    store_paths(matrix, row, col, path)


def parse_value(value, kind):
    converters = {
        "int": int,
        "str": None,  # doesn't need conversion
        "float": float,
        "csv": lambda v: [item.strip() for item in v.split(",")],
        "str": lambda v: v.strip(),
    }
    if kind in converters:
        converter = converters[kind]
    else:
        converter = None

    if hasattr(converter, "__call__"):
        return converter(value)

    return value


def copy_file(file1, file2):
    with open(file1, "rb") as f1:
        with open(file2, "wb") as f2:
            f2.write(f1.read())
