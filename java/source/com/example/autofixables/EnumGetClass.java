public enum EnumGetClass {
    APPLE,
    BANANA {
        @Override
        public String toString() {
            return "banana";
        }
    };

    int classNameSize() {
        return getClass()
                .getName()
                .length();
    }
}
