package org.extra.clientapplicationapi;

import org.springframework.stereotype.Service;
import org.springframework.web.reactive.function.client.WebClient;
import reactor.core.publisher.Mono;

@Service
public class APICalls {
    private final WebClient webClient;

    public APICalls(){
        this.webClient = WebClient.create("http://localhost:8080");
    }

    public Mono<String> getDoctor(int id){
        return this.webClient
                .get()
                .uri("/api/doctors/{id}", id)
                .retrieve()
                .bodyToMono(String.class);
    }

    public Mono<String> postVisit(String firstName, String lastName, int doctorId){
        return this.webClient
                .post()
                .uri("api/visits?firstName={firstname}&lastName={lastName}&doctorId={doctorId}", firstName, lastName, doctorId)
                .retrieve()
                .bodyToMono(String.class);
    }
}
