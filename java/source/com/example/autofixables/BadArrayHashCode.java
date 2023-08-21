class BadArrayHashCode {
    public static void main(String[] args) {
        int[] evens = new int[] {2, 4, 6};
        int hash = java.util.Arrays.hashCode(evens);
    }
}
