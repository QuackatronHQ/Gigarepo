"""Simple calculator app"""

import math

def main():
    while True:
        try:
            string = input("> ")
            parts = string.split(" ")
            if len(parts) == 3 and parts[0] == "log":
                print(math.log(int(parts[2]), int(parts[1])))
            else:
                print(eval(string))
        except (KeyboardInterrupt, EOFError):
            print()
            exit()
        except Exception as e:
            print(e)

if __name__ == "__main__":
    print("Welcome to calculator!")
    main()
