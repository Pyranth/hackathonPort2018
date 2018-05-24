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
import android.widget.Switch;
import android.widget.TextView;

import org.json.JSONObject;

import java.io.BufferedOutputStream;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

import portomontenegro.portomontenegro.R;

/**
 * Created by user on 23.5.2018..
 */

public class ReqFragment extends Fragment
{

    public ReqFragment(){};

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
        final TextView txtTest = (TextView)rootView.findViewById(R.id.txtComment);
        svicClean.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicClean.isChecked()) {
                    txtTest.setText("Radi Clean");
                } else {
                    txtTest.setText("Radi opet Clean");
                }
            }
        });
        svicDoNot.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicDoNot.isChecked()) {
                    txtTest.setText("Radi DoNot");
                } else {
                    txtTest.setText("Radi opet DoNot");
                }
            }
        });
        svicSpa.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicSpa.isChecked()) {
                    txtTest.setText("Radi svicSpa");
                } else {
                    txtTest.setText("Radi opet svicSpa");
                }
            }
        });
        svicMassage.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (svicMassage.isChecked()) {
                    txtTest.setText("Radi svicMassage");
                } else {
                    txtTest.setText("Radi opet svicMassage");
                }
            }
        });
        btnSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {



            }
        });
        return rootView;
    }

}
