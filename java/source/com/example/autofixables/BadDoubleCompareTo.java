class Main {

}

class Filter {
    String featureName = "";
}

public class BadDoubleCompareTo implements Comparable<Main> {
    @Override
    public int compareTo(Main o) {
        double d1 = Math.random();
        double d2 = Math.random();
        boolean b = d1 > d2; // raise: JAVA-W1032

        if (d1 == d2) { // raise: JAVA-W1032
            return 0;
        }

        if (d1 > d2) { // raise: JAVA-W1032
            return 0;
        }

        if (d1 < d2) { // raise: JAVA-W1032
            return 0;
        }

        if (d1 <= d2) { // raise: JAVA-W1032
            return 0;
        }

        if (d1 >= d2) { // raise: JAVA-W1032
            return 0;
        }

        if (d1 != d2) { // raise: JAVA-W1032
            return 0;
        }

        return 1;
    }

    @Override
    public boolean equals(Object obj) {
        double minValue = 1.0, maxValue = 2.0;
        String featureName = "";
        Filter filter = new Filter();
        boolean result = java.util.Objects.equals(featureName, filter.featureName) && (minValue == maxValue);
        return super.equals(obj);
    }
}
