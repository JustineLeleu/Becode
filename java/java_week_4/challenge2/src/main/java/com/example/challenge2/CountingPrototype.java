package com.example.challenge2;

import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

import java.util.Arrays;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

@Component
@Scope("prototype")
public class CountingPrototype {
    public List<Map<String, Integer>> countWords(String[] sentence)
    {
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
