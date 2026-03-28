"""Simple calculator app"""
import ast


def main():
    while True:
        try:
            string = input("> ")
            print(ast.literal_eval(string))
        except (KeyboardInterrupt, EOFError):
            print()
            exit()
        except (BaseException, KeyboardInterrupt) as e:
            print(e)


if __name__ == "__main__":
    print("Welcome to calculator!")
    main()
