package portomontenegro.portomontenegro.Fragmenti;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import portomontenegro.portomontenegro.R;
import portomontenegro.portomontenegro.RoomControl.MainRoomControl;

/**
 * Created by user on 23.5.2018..
 */

public class RoomControlFragment extends Fragment
{
    public RoomControlFragment(){};

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, Bundle savedInstanceState)
    {
        View rootView = inflater.inflate(R.layout.room_control_layout, container, false);
        new MainRoomControl();

        return rootView;
    }
}
