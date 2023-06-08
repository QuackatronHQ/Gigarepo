public enum EnumGetClass {
    A,
    B {
        @Override
        public String toString() {
            return "AYYYYY";
        }
    };

    int classNameSize() {
        return getClass()// raise: JAVA-E1106
                .getName()
                .length();
    }
}
