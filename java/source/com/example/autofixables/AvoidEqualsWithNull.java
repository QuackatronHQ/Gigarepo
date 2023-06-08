class AvoidEqualsWithNull {
    void method() {
        String a = "er";

        if (a.equals(null)) { // raise: JAVA-E0051
            System.out.println("adffs");
        }
    }
}
