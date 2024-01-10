package com.example.challenge1;

import org.springframework.context.annotation.PropertySource;
import org.springframework.core.env.Environment;
import org.springframework.stereotype.Service;
import org.springframework.beans.factory.annotation.Value;

@Service
@PropertySource("classpath:application.properties")
public class GreetingsService
{
    Environment environment;
    private String request;

    GreetingsService(@Value("${configured_language}") String language, Environment environment)
    {
        this.request = language + "_hello_world";
        this.environment = environment;
    }

    public String getMessage()
    {
        return this.environment.getProperty(this.request);
    }

    public void setRequest(String language)
    {
        this.request = language + "_hello_world";
    }
}