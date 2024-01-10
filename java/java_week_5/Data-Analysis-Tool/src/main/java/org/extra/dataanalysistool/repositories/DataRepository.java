package org.extra.dataanalysistool.repositories;

import org.extra.dataanalysistool.components.FileLine;
import org.springframework.stereotype.Repository;

import java.io.*;
import java.util.*;
import java.util.stream.Stream;

@Repository
public class DataRepository {
    List<FileLine> data;

    public DataRepository()
    {
        try(InputStream inputFS = new FileInputStream("Data-Analysis-Tool/src/main/resources/static/effects-of-covid19-on-trade.csv"); BufferedReader br = new BufferedReader(new InputStreamReader(inputFS)))
        {
            data = br.lines()
                    .skip(1)
                    .map(FileLine::new)
                    .toList();
        }
        catch (IOException e)
        {
            throw new RuntimeException(e);
        }
    }

    private Stream<FileLine> getMonthly(String year, String month, String country, String commodity, String transport_mode, String measure){
        return data.stream()
                .filter(line -> Objects.equals(line.getColumns()[1], year))
                .filter(line -> Objects.equals(line.getColumns()[2].split("/")[1], month))
                .filter(line -> Objects.equals(line.getColumns()[4], country))
                .filter(line -> Objects.equals(line.getColumns()[5], commodity))
                .filter(line -> Objects.equals(line.getColumns()[6], transport_mode))
                .filter(line -> Objects.equals(line.getColumns()[7], measure));
    }

    private Stream<FileLine> getYearly(String year, String country, String commodity, String transport_mode, String measure){
        return data.stream()
                .filter(line -> Objects.equals(line.getColumns()[1], year))
                .filter(line -> Objects.equals(line.getColumns()[4], country))
                .filter(line -> Objects.equals(line.getColumns()[5], commodity))
                .filter(line -> Objects.equals(line.getColumns()[6], transport_mode))
                .filter(line -> Objects.equals(line.getColumns()[7], measure));
    }

    public long getMonthlyTotal(String year, String month, String country, String commodity, String transport_mode, String measure){
        return getMonthly(year, month, country, commodity, transport_mode, measure)
                .mapToLong(FileLine::getValue)
                .sum();
    }

    public double getMonthlyAverage(String year, String month, String country, String commodity, String transport_mode, String measure){
        return getMonthly(year, month, country, commodity, transport_mode, measure)
                .mapToDouble(FileLine::getValue)
                .average()
                .orElse(0.0);
    }

    public long getYearlyTotal(String year, String country, String commodity, String transport_mode, String measure){
        return getYearly(year, country, commodity, transport_mode, measure)
                .mapToLong(FileLine::getValue)
                .sum();
    }

    public double getYearlyAverage(String year, String country, String commodity, String transport_mode, String measure){
        return getYearly(year, country, commodity, transport_mode, measure)
                .mapToDouble(FileLine::getValue)
                .average()
                .orElse(0.0);
    }

    public Map<String, List<String>> getOverview(){
        List<String> countries = data.stream().map(fileLine -> fileLine.getColumns()[4]).distinct().toList();
        List<String> commodities = data.stream().map(fileLine -> fileLine.getColumns()[5]).distinct().toList();
        List<String> transportation_mode = data.stream().map(fileLine -> fileLine.getColumns()[6]).distinct().toList();
        List<String> measures = data.stream().map(fileLine -> fileLine.getColumns()[7]).distinct().toList();

        return new HashMap<>(){{
            put("countries", countries);
            put("commodities", commodities);
            put("transportation_mode", transportation_mode);
            put("measures", measures);
        }};
    }
}
