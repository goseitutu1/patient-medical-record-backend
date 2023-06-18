<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KompleteCare Medical Report</title>
    <style type="text/css">
        body {
            Margin: 0;
            padding: 0;
            background: #f6f9fc;
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }

        @media screen and (max-width: 600px) {
        }
        @media screen and (max-width: 400px) {
        }
    </style>
</head>
<body>
<center style="width: 100%;table-layout: fixed;background-color: #f6f9fc;">
    <div style="max-width: 600px;background-color: #FFFFFF;">
        <table style="Margin:0 auto;width: 100%;max-width:600px;font-family: sans-serif;color: #4a4a4a;" align="center">
            <tr>
                <td style="background-color: #167FD7;padding:20px 10px;text-align: center;">
                    <a href="{{env('APP_URL')}}"><img src="{{asset('images/komplete.jpg')}}" alt="KompleteCare" title="KompleteCare" style="height: 100px;width: auto;"></a>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 20px;">
                    <p style="font-size: 14px; color: #25383C; font-weight: 400;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                        Hello Team, Kindly find patient medical record below.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 20px;">
                    <div style="font-size: 14px; color: #25383C; font-weight: 400;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                        <table>
                            <tr>
                                <td>Patient Name</td>
                                <td>{{$patientMedicalRecord->patient_name}}</td>
                            </tr>
                            <tr>
                                <td>Chest</td>
                                <td><input type="checkbox" {{$patientMedicalRecord->chest ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Lumbo Sacral Vertebrae</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->lumbo_sacral_vertebrae ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Shoulder Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->shoulder_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Pelvic Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->pelvic_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Humerus</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->humerus ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Fingers</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->fingers ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Cervical Vertebrae</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->cervical_vertebrae ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Thoraco Lumbar Vertebrae</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->thoraco_lumbar_vertebrae ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Elbow Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->elbow_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Hip Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->hip_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Radius/Ulner</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->radius_or_ulner ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Toes</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->toes ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Thoracic Vertebrae</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->thoracic_vertebrae ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Wrist Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->wrist_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Knee Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->knee_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Femoral</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->femoral ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Foot</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->foot ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Lumvar Vertebrae</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->lumvar_vertebrae ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Thoracic Inlet</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->thoracic_inlet ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Sacro Lliac Joint</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->sacro_lliac_joint ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Ankle</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->ankle ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Tibia/Fibula</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->tibia_or_fibula ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Obstetric</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->obstetric ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Breast</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->breast ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Thyroid</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->thyroid ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Abdioninal</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->abdioninal ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Pelvis</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->pelvis ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>Prostrate</td>
                                <td><input type="checkbox"  {{$patientMedicalRecord->prostrate ? 'checked' : ''}}/></td>
                            </tr>
                            <tr>
                                <td>CT Scan</td>
                                <td>{{$patientMedicalRecord->ct_scan ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td>MRI</td>
                                <td>{{$patientMedicalRecord->mri ?? 'N/A'}}</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 20px;">
                    <p style="font-size: 14px; color: #25383C; font-weight: 400;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                        Thanks,<br/>
                        <span style="font-weight: 700;">KompleteCare</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color: #BA0C25;padding:20px 10px;text-align: center; color: white">
                    <h5>Gideon Osei Tutu</h5>
                </td>
            </tr>
        </table>
    </div>
</center>
</body>
</html>
