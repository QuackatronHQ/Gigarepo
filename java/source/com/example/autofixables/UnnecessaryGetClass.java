class Helper {

}

public class UnnecessaryGetClass {
    void method() {
        Class<? extends Helper> c = new Helper().getClass(); // raise: JAVA-W0077
    }
}
