class Main {
    void triggerProcess() {
        System.out.println("Starting process...");
    }
}

class Filter {
    public final String featureName = "Another feature.";
}

public class BadDoubleCompareTo implements Comparable<Main> {
    @Override
    public int compareTo(Main o) {
        double d1 = Math.random();
        double d2 = Math.random();
        boolean b = d1 > d2;

        if (d1 == d2) {
            System.out.println("d1 == d2");
            return 0;
        }

        if (d1 > d2) {
            System.out.println("d1 > d2");
            return 1;
        }

        if (d1 < d2) {
            System.out.println("d1 < d2");
            return -1;
        }

        if (d1 <= d2) {
            System.out.println("d1 <= d2");
            return -1;
        }

        if (d1 >= d2) {
            System.out.println("d1 >= d2");
            return 1;
        }

        if (d1 != d2) {
            System.out.println("d1 != d2");
            return 1;
        }

        return 0;
    }

    @Override
    public boolean equals(Object obj) {
        double minValue = 1.0, maxValue = 2.0;
        String featureName = "some-feature";
        Filter filter = new Filter();
        boolean result = java.util.Objects.equals(featureName, filter.featureName) && (minValue == maxValue);
        return super.equals(obj);
    }
}
