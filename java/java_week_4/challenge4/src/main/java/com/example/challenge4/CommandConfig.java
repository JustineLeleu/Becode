package com.example.challenge4;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.Scope;

@Configuration
public class CommandConfig {

    @Bean
    @Scope("singleton")
    public ReportCommand getReportCommand()
    {
        return new ReportCommand();
    }

    @Bean
    @Scope("prototype")
    public RegisterCommand getRegisterCommand()
    {
        return new RegisterCommand(getReportCommand());
    }
}
