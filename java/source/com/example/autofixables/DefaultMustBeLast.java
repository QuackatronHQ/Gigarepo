public class DefaultMustBeLast {
    public static void main(String[] args) {
        final int value = 10;
        switch (value) { // raise: JAVA-W1010
            case 20:
                System.out.println("Value is 20!");
                break;
            default:
                System.out.println("Default case!");
                break;
            case 10:
                System.out.println("Value if 10!");
                break;
        }

        int ret = switch (value) { // raise: JAVA-W1010
            default -> 0;
            case 1 -> 1;
            case 2 -> 2;
        };

        int moreRet = switch (value) { // raise: JAVA-W1010
            default -> {
                System.out.println("default");
                yield 0;
            }
            case 1 -> {
                System.out.println("1");
                yield 1;
            }
            case 2 -> {
                System.out.println("2");
                yield 2;
            }
        };

        // No `break` at the last case.
        switch (value) { // raise: JAVA-W1010
            case 20:
                System.out.println("Value is 20!");
                break;
            default:
                System.out.println("Default or 30 !");
                break;
            case 10:
                System.out.println("Value if 10!");
        }

        switch (value) { // raise: JAVA-W1010
            case 20:
                System.out.println("Value is 20!");
                break;
            default:
            case 30:
                System.out.println("Default or 30 !");
                break;
            case 10:
                System.out.println("Value if 10!");
                break;
        }
    }
}
