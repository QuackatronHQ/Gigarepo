package checkerTests;

import java.time.ZoneId;

public class ZoneIdOfZ {
    void thing() {
        ZoneId aa = ZoneId.of("Z"); // raise: JAVA-W1085
    }
}
