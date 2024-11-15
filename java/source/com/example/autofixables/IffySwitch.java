class IffySwitch {
    void thing() {
        int a = 1;

        if (a == 2) {
            System.out.println("first 2");
            System.out.println("second 2");
            System.out.println("third 2");
        } else {
            System.out.println("default");
        }
        
        if (a == 2) {
            System.out.println("2");
        } else {
            System.out.println("default");
        }

        if (a == 2) {
            System.out.println("2");
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
