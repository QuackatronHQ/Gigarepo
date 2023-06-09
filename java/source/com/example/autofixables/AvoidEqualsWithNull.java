class AvoidEqualsWithNull {
    void method() {
        String a = "er";

        if (a.equals(null)) {
            System.out.println("Some message goes here");
        }
    }
}
