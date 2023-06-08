public class RedundantBooleanLiteral {

    public void test() {
        boolean something = returnsBoolean() ? true : false; // raise: JAVA-W1064
        boolean onemorething = (returnsBoolean() == true); // raise: JAVA-W1064
        boolean thing2 = returnsBoolean() == false; // raise: JAVA-W1064
        boolean thing3 = true == false; // raise: JAVA-W1064
        boolean otherthing = true;

        boolean result = (this.urlText == null ? false : !this.urlText.equals(""));

        if (something = false) {
            // something goes here
        }

        if (returnsBoolean() == true) { // raise: JAVA-W1064
            System.out.println("here already");
        }

        if (!false) { // raise: JAVA-W1064
            System.out.println("here already");
        }

        if (something || true) { // raise: JAVA-W1064
            System.out.println("here already");
        }

        if (something || false) { // raise: JAVA-W1064
            System.out.println("here already");
        }

        if (something && true) { // raise: JAVA-W1064
            System.out.println("here already");
        }

        if (something && false) { // raise: JAVA-W1064
            System.out.println("here already");
        }

        if (returnsBoolean() == (Boolean)false) {
            // ...
        }

        if ((Boolean)false == returnsBoolean()) {
            // ...
        }
    }
}
