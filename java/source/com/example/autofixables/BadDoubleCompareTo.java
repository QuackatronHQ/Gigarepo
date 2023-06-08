import org.jetbrains.annotations.NotNull;

public class BadDoubleCompareTo implements Comparable<BadDoubleCompareTo> {
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
        Objects.equals(featureName, filter.featureName) && (minValue == maxValue);
        return super.equals(obj);
    }
}
