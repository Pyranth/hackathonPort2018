package portomontenegro.portomontenegro.RetrofitPoziv;

import java.util.concurrent.TimeUnit;

import okhttp3.OkHttpClient;
import portomontenegro.portomontenegro.Interfaces.APIservisi;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * Created by user on 25.5.2018..
 */

public class RetrofitCall
{
    private static final String ROOT_URL = "http://192.168.1.61/";

    static OkHttpClient client = new OkHttpClient.Builder()
            .connectTimeout(20, TimeUnit.SECONDS)
            .readTimeout(20, TimeUnit.SECONDS)
            .build();

    private static Retrofit getRetrofitInstance() {
        return new Retrofit.Builder()
                .baseUrl(ROOT_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .client(client)
                .build();
    }

    public static APIservisi getApi() {
        return getRetrofitInstance().create(APIservisi.class);
    }
}
