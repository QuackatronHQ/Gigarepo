class BadArrayComparison {
    public static void main(String[] args) {
        int[] evens = new int[] {2, 4, 6};
        int[] odds = new int[] {1, 3, 5};

        // This is a reference comparison, so this might not work as expected.
        if (evens.equals(odds)) {
            System.out.println("Some message!");
        }
    }
}
