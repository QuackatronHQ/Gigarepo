public class PrivateFinalMethodCanBeStatic {
    private String instanceField = "";

    // Bad case.
    private final void shouldBeStatic() { // raise: JAVA-W1057 | ignore: JAVA-W0324
    }

    private final void instanceFieldAccessed() { // ignore: JAVA-W0324
        System.out.println(instanceField);
    }
}
