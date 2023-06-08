class Helper {
    // Some code goes here.
}

public class UnnecessaryGetClass {
    void method() {
        Class<? extends Helper> c = new Helper().getClass();
    }
}
