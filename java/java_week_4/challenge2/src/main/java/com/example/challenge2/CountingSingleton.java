package com.example.challenge2;

import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

import java.util.*;
import java.util.stream.Collectors;

@Component
@Scope("singleton")
public class CountingSingleton {
    public List<Map<String, Integer>> countWords(String[] sentence)
    {
        // Version 1 with only one sentence given
        /*
        String[] words = sentence
                .replaceAll("\\p{Punct}", "")
                .toLowerCase().split(" ");

        return Arrays.stream(words)
                .collect(Collectors.groupingBy(word -> word, Collectors.summingInt(e -> 1)));
         */

        // Version 2 with array of sentence given
        return Arrays.stream(sentence)
                .map(s -> Arrays.stream(s
                        .replaceAll("\\p{Punct}", "")
                        .toLowerCase()
                        .split(" "))
                        .filter(el -> !el.isEmpty())
                        .collect(Collectors.groupingBy(word -> word, Collectors.summingInt(e -> 1))))
                .toList();
    }
}
