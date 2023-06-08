public class FormatStrNewline {
    public static void main(String[] args) {
        var str = String.format("this bad %d\n", 10); // raise: JAVA-W0379
        System.out.println(str);
    }
}
