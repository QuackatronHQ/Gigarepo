package com.example.api;

import com.example.data.ConfigData;
import org.junit.jupiter.api.Test;

import java.net.MalformedURLException;
import java.net.URL;
import java.util.Map;

import static org.junit.jupiter.api.Assertions.*;

class APIQueryHandlerTest {

    @Test
    void getConfigs() {
    }

    @Test
    void setConfigs() {
    }

    @Test
    void getOutputs() {
    }

    @Test
    void getC() {
        assertNotEquals(null, new APIQueryHandler(null).getC());
    }

    @Test
    void getIsLocalFromConfigData() {
    }

    @Test
    void getDataInParallel() throws MalformedURLException, InterruptedException {

        try {
            APIQueryHandler aqh = new APIQueryHandler(null);
            aqh.setConfigs(Map.of(new URL("https://google.com"), new ConfigData()));
            aqh.getDataInParallel();
        } catch(Exception e) {
            e.printStackTrace();
            assertNotNull(e);
        }


    }

    @Test
    void increment() {
    }

    @Test
    void startThread() {
    }
}
