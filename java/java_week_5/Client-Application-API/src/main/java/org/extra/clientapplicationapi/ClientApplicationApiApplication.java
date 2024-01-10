package org.extra.clientapplicationapi;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import reactor.core.publisher.Mono;

@SpringBootApplication
public class ClientApplicationApiApplication {

    public static void main(String[] args) {
        SpringApplication.run(ClientApplicationApiApplication.class, args);
        ApplicationContext context = new AnnotationConfigApplicationContext(APICalls.class);
        APICalls call = context.getBean(APICalls.class);
        Mono<String> doctor1 = call.getDoctor(1);
        System.out.println(doctor1.block());
        Mono<String> visit1 = call.postVisit("Justine", "Leleu", 1);
        System.out.println(visit1.subscribe());
    }

}
