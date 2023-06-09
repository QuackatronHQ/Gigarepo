public class RedundantBooleanLiteral {
    String urlText = "https://google.com/auth";

    private boolean userLoggedIn() {
        return false;
    }

    public void test() {
        boolean loggedIn = userLoggedIn() ? true : false;
        boolean onemorething = (userLoggedIn() == true);
        boolean thing2 = userLoggedIn() == false;
        boolean thing3 = true == false;
        boolean otherthing = true;

        boolean result = (this.urlText == null ? false : !this.urlText.equals(""));

        if (loggedIn = false) {
            System.out.println("Not logged in");
        }

        if (userLoggedIn() == true) {
            System.out.println("Logged in");
        }

        if (!false) {
            System.out.println("Can be simplified");
        }

        if (loggedIn || true) {
            System.out.println("This is always printed");
        }

        if (loggedIn || false) {
            System.out.println("Execution of this if depends on the value of loggedIn");
        }

        if (loggedIn && true) {
            System.out.println("Execution of this if depends on the value of loggedIn");
        }

        if (loggedIn && false) {
            System.out.println("Never executed");
        }
    }
}
