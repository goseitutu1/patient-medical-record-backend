user auth_token = eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiMzY1Y2IxYjEzMGExZDI0NDNiNTQwNTdjYTU3ZjFiMDE0NDkxYjQxNTNmMTA4Y2VmMzJkODg4YmFlNjNlZTBjMzA3MzRiMTE4ZDkyYjZjYmQiLCJpYXQiOjE2ODcxMTM1MTguNTA4MjA4LCJuYmYiOjE2ODcxMTM1MTguNTA4MjA5LCJleHAiOjE3MTg3MzU5MTguNTA2ODcsInN1YiI6IjUiLCJzY29wZXMiOltdfQ.AMEmrITdvEo7Sqms5IkbZwi_963Nif1Uofdva4yhzq6yqQhrBrws9MwcxBgOpyGK-gnhGUpStKOXB6r-peOqKeh427dI47PT-lmhuMlphG3jnoymGOJFIa_lU2WBJ2THBoRcnW1vx6w2-CiKR1cSI1dZ4tMkFyKzLatvWMeZPwmTdv9WdgGFEXXN41oOMl54HgCoUCRBpODEZk6nM9u98VKR7SV9m5stpR29jCElGnCdTQLsqCbTOr7yPPZReF185dtsWsPZCZDojXsg63dUUJcIKbMcw9X80-9za1pYFluJEPKNiglIgtj3fGHPtnMcIXrFnl36pJMt8Mwd28Zs7GlymhpkqlQgRYdBQsVNfP-d8m-Nmb-fTR4Iczf6DHLeRKP3fLnoHHQ67RafxgGs3PppPGDoeKP2SQasrCRTOR9QHtgZH8ziFAVz70VAiBVpYBW4iB3MVs6ToN86XTFTkkGGY49JHhVYroDkCiysk6jcOe0hUud3CE5vuiatFQhWd63RQx16vqmB0WbPhHhZoXAMOlQSBMLDHtkhlwfdN2cuxru4gJ5nfep5XABHY2tb9L_rsWt6CbA1FMNeOA30-3TGjPWsHmd16TtkWNawyxXQiEPNhB8_vFTuztj-NrX26YVF8lCVABO52x3nHkPAqBTQUYKCNlXxYiCauR67e9Y

create patient medical record endpoint = https://patient.eitsectechnologies.com/api/create-patient-medical-record
method = post
parameters = [patient_name = required,mri = not required, ct_scan = not required, chest = not required,
lumbo_sacral_vertebrae = not required, shoulder_joint = not required, pelvic_joint = not required,
humerus = not required,fingers = not required,cervical_vertebrae = not required,thoraco_lumbar_vertebrae = not required,elbow_joint = not required,
hip_joint = not required, radius_or_ulner = not required, toes = not required,thoracic_vertebrae = not required, wrist_joint = not required,
knee_joint = not required, femoral = not required,foot = not required, lumvar_vertebrae = not required, thoracic_inlet = not required, sacro_lliac_joint = not required,
ankle = not required, tibia_or_fibula = not required, obstetric = not required, abdioninal = not required, pelvis = 0, prostrate = not required,
breast = not required, thyroid = not required]

edit patient medical record endpoint = https://patient.eitsectechnologies.com/api/edit-patient-medical-record
method = post
parameters = [patient_id = required,patient_name = required,mri = not required, ct_scan =not required, chest = not required,
lumbo_sacral_vertebrae = not required, shoulder_joint = not required, pelvic_joint = not required,
humerus = not required,fingers = not required,cervical_vertebrae = not required,thoraco_lumbar_vertebrae = not required,elbow_joint = not required,
hip_joint = not required, radius_or_ulner = not required, toes = not required,thoracic_vertebrae = not required, wrist_joint = not required,
knee_joint = not required, femoral = not required,foot = not required, lumvar_vertebrae = not required, thoracic_inlet = not required, sacro_lliac_joint = not required,
ankle = not required, tibia_or_fibula = not required, obstetric = not required, abdioninal = not required, pelvis = 0, prostrate = not required,
breast = not required, thyroid = not required]

get patient medical record endpoint = https://patient.eitsectechnologies.com/api/get-patient-medical-record?patient_id=4
method = get

get all medical records endpoint = https://patient.eitsectechnologies.com/api/get-all-medical-records
method = get

signup endpoint = https://patient.eitsectechnologies.com/api/signup
method = post
parameters = [email = required, password = required,password_confirmation = required, full_name = required]

login endpoint = https://patient.eitsectechnologies.com/api/login
method = post
parameters = [email = required, password = required, full_name = required]

There is also graphQL implementation in the graphql/schema.graphql file
