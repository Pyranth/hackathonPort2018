package portomontenegro.portomontenegro.Fragmenti;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONObject;

import java.io.BufferedOutputStream;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

import portomontenegro.portomontenegro.Interfaces.APIservisi;
import portomontenegro.portomontenegro.Models.QueriesModel;
import portomontenegro.portomontenegro.R;
import portomontenegro.portomontenegro.RetrofitPoziv.RetrofitCall;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by user on 23.5.2018..
 */

public class ReqFragment extends Fragment
{

    public ReqFragment(){};
    private Call<String> call;
    protected APIservisi api =  RetrofitCall.getApi();
    EditText message;
    boolean cleanBool, noNotBool, spaBool, massageBool;

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, Bundle savedInstanceState)
    {
        View rootView = inflater.inflate(R.layout.req_layout, container, false);

       final Switch svicClean = (Switch)rootView.findViewById(R.id.switchCleanRoom);
       final Switch svicDoNot = (Switch)rootView.findViewById(R.id.switchDoNot);
       final Switch svicSpa = (Switch)rootView.findViewById(R.id.switchSpa);
       final Switch svicMassage = (Switch)rootView.findViewById(R.id.switchMassage);
             Button btnSend = (Button) rootView.findViewById(R.id.btnSend);
            message = rootView.findViewById(R.id.txtComment);


        svicClean.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicClean.isChecked()) {
                    cleanBool = true;
                } else {
                    cleanBool = false;

                }
            }
        });
        svicDoNot.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicDoNot.isChecked()) {
                    noNotBool= true;
                } else {
                    noNotBool= false;

                }
            }
        });
        svicSpa.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicSpa.isChecked()) {
                   spaBool = true;
                } else {
                    spaBool = false;
                }
            }
        });
        svicMassage.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicMassage.isChecked()) {
                    massageBool = true;
                } else {
                    massageBool = false;

                }
            }
        });
        btnSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                call = api.setQuery(message.getText().toString()
                        , massageBool
                        , spaBool
                        , noNotBool
                        , cleanBool);

                call.enqueue(new Callback<String>()
                {
                    @Override
                    public void onResponse(Call<String> call, Response<String> response)
                    {
                        if(response.isSuccessful())
                        {
                            Toast.makeText(getContext(), "Proslo", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<String> call, Throwable t)
                    {

                    }
                });


            }
        });
        return rootView;
    }

}
