package portomontenegro.portomontenegro.Interfaces;

import portomontenegro.portomontenegro.Models.QueriesModel;
import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Query;

/**
 * Created by user on 25.5.2018..
 */

public interface APIservisi
{

    @GET("hackathonPort2018/webapp/dbscripts/room-request.php")
    Call<String> setQuery(@Query("message") String message,
                                @Query("massage") Boolean massage,
                                @Query("spa") Boolean spa,
                                @Query("dnd") Boolean dnd,
                                @Query("clean") Boolean clean);

}
