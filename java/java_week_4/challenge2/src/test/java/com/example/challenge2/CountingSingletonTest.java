package com.example.challenge2;

import org.junit.jupiter.api.Test;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static org.junit.jupiter.api.Assertions.*;

class CountingSingletonTest {

    @Test
    void testOneSentence()
    {
        ApplicationContext context = new AnnotationConfigApplicationContext(CountingSingleton.class);
        CountingSingleton counting = context.getBean(CountingSingleton.class);
        String[] testArray = new String[]{"This is a sentence."};
        List<Map<String, Integer>> expectedResult = new ArrayList<>(){{
            add(new HashMap<>(){{
                put("this", 1);
                put("is", 1);
                put("a", 1);
                put("sentence", 1);
            }});
        }};
        assertEquals(counting.countWords(testArray), expectedResult);
    }

    @Test
    void testMultipleSentence()
    {
        ApplicationContext context = new AnnotationConfigApplicationContext(CountingSingleton.class);
        CountingSingleton counting = context.getBean(CountingSingleton.class);
        String[] testArray = new String[]{"This is a sentence.", "And this is another: sentence!", "And is this another one?"};
        List<Map<String, Integer>> expectedResult = new ArrayList<>(){{
            add(new HashMap<>(){{
                put("this", 1);
                put("is", 1);
                put("a", 1);
                put("sentence", 1);
            }});
            add(new HashMap<>(){{
                put("and", 1);
                put("this", 1);
                put("is", 1);
                put("another", 1);
                put("sentence", 1);
            }});
            add(new HashMap<>(){{
                put("and", 1);
                put("is", 1);
                put("this", 1);
                put("another", 1);
                put("one", 1);
            }});
        }};
        assertEquals(counting.countWords(testArray), expectedResult);
    }

    @Test
    void testDoubleInSentence()
    {
        ApplicationContext context = new AnnotationConfigApplicationContext(CountingSingleton.class);
        CountingSingleton counting = context.getBean(CountingSingleton.class);
        String[] testArray = new String[]{"This is a Sentence sentence."};
        List<Map<String, Integer>> expectedResult = new ArrayList<>(){{
            add(new HashMap<>(){{
                put("this", 1);
                put("is", 1);
                put("a", 1);
                put("sentence", 2);
            }});
        }};
        assertEquals(counting.countWords(testArray), expectedResult);
    }
}