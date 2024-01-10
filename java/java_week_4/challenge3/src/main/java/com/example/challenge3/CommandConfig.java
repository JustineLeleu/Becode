package com.example.challenge3;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class CommandConfig {

    @Bean
    public HelloCommand getHelloCommand(){
        return new HelloCommand();
    }

    @Bean
    public TimeCommand getTimeCommand(){
        return new TimeCommand();
    }
}
