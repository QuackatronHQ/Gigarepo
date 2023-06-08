public class UnnecessaryGetClass {
    void method() {
        Class<Helper> c = new Helper().getClass(); // raise: JAVA-W0077
        Class<Helper> c2 = new /*bro*/Helper() // Some more comment.
                .getClass(); // raise: JAVA-W0077
        Class<Helper> c3 = new Helper()./*x.y*/getClass(); // raise: JAVA-W0077
    }
}
