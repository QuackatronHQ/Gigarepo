class BadArrayComparison {
    public static void main(String[] args) {
        int[] evens = new int[] {2, 4, 6};
        int[] odds = new int[] {1, 3, 5};

        if (evens.equals(odds)) { // raise: JAVA-E0348
            System.out.println("This bad bro!");
        }
    }
}
