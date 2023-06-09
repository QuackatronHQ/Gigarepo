class IffySwitch {
    void thing() {
        int a = 1;

        switch (a) {
            case 2:
                System.out.println("first 2");
            {
                System.out.println("second 2");
            }
                System.out.println("third 2");
                break;
            default:
                System.out.println("default");
        }
        
        switch (a) {
            case 2: {
                System.out.println("2");
                break;
            }
            default: {
                System.out.println("default");
            }
        }

        switch (a) {
            case 2: {
                System.out.println("2");
            }
            default: {
                System.out.println("default");
            }
        }

        switch (a) {
            case 1, 2, 3 ->  {
                System.out.println("first 123");
                System.out.println("second 123");
            }
            default -> System.out.println("default");
        }
    }
}
