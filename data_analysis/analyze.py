import matplotlib.pyplot as plt
import pandas as pd
import numpy as np 
import re
header_list = ["pmid", "pmcid", "created", "length", "position", "accessions", "year", "authors", "title", "text","type", "id"]
df = pd.read_excel('data_unique.xlsx', engine='openpyxl')
salary = list(df['salary'])
location = list(df['location'])
# print(location)
# print(salary)

def salary_analyzer(salary_lst):
    temp = []
    result = []
    regex = r'[1-9][0-9]+'
    for val in salary_lst:
        temp += re.findall(regex, val)

    for idx in temp:
        if idx != ' ' and len(idx) == 3:
            result += [int(idx)/100]
        elif idx != ' ' and len(idx) == 4:
            result += [int(idx)/1000 * 23]
        elif idx != ' ' and len(idx) > 6:
            result += [int(idx) / 1000000]
        else:
            result += [int(idx)]  
    #print(result)
    lable = ['< 10', '10 - 20', '20 - 30', '30 - 40', '40 - 50', '50 - 60', '60 - 70', '70 - 80', '80 - 90', '90 - 100', '> 100']
    values = [0] * 11
    for val in result:
        if val < 10:
            values[0] += 1
        elif val >= 10.0 and val < 20.0:
            values[1] += 1
        elif val >= 20.0 and val < 30.0:
            values[2] += 1
        elif val >= 30.0 and val < 40.0:
            values[3] += 1
        elif val >= 40.0 and val < 50.0:
            values[4] += 1
        elif val >= 50.0 and val < 60.0:
            values[5] += 1
        elif val >= 60.0 and val < 70.0:
            values[6] += 1
        elif val >= 70.0 and val < 80.0:
            values[7] += 1
        elif val >= 80.0 and val < 90.0:
            values[8] += 1
        elif val >= 90.0 and val < 100.0:
            values[9] += 1
        else:
            values[10] += 1
    
    print(values)
    plt.figure(figsize=(9, 6))

    plt.plot('pmid')
    plt.bar(lable, values)
    plt.title('title')
    plt.text('text')
    plt.text('authors')
    plt.xlabel('type')
    plt.xlabel('id')
    plt.ylabel('')
    plt.show('type')

def location_analyze(location_ar):
    temp = []
    result = []
    for val in location_ar:
        if re.findall(',', str(val)):
            temp += [val[val.rfind(',') + 2:]]
        else:
            temp += [val]

    for val in temp:
        if re.findall('[0-9.-]', str(val)):
            continue
        else:
            result += [val]
    
    dic = {}

    dic_res = {}
    for idx in dic:
        if dic[idx] >= 50:
            dic_res[idx] = dic[idx]

    print(dic_res)

    label = dic_res.keys()
    values = dic_res.values()

    colors = (0,0,0)
    area = np.pi*3


def loca_salary_analyze(location_ar, salary_lst):
    temp_salary = []
    result_salary = []
    regex = r'[1-9][0-9]+'
    for val in salary_lst:
        temp_salary += re.findall(regex, val)

    for idx in temp_salary:
        if idx != ' ' and len(idx) == 3:
            result_salary += [int(idx)/100]
        elif idx != ' ' and len(idx) == 4:
            result_salary += [int(idx)/1000 * 23]
        elif idx != ' ' and len(idx) == 5:
            result_salary += [int(idx)/10000]
        elif idx != ' ' and len(idx) >= 6:
            result_salary += [int(idx) / 1000000]
        else:
            result_salary += [int(idx)]    
    
    exac = [round(val, 1) for val in result_salary]
    for val in exac:
        print(val)

    temp_location = []
    result_location = []
    for val in location_ar:
        if re.findall(',', str(val)):
            temp_location += [val[val.rfind(',') + 2:]]
        else:
            temp_location += [val]

    for val in temp_location:
        if re.findall('[0-9.-]', str(val)):
            continue
        else:
            result_location += [val]

    dic = {}
    for val in range(len(result_location)):
        if result_location[val] in dic.keys():
            print(dic[result_location[val]][0])
            print(dic[result_location[val]][1])
            dic[result_location[val]][0] += 1
            dic[result_location[val]][1] += exac[val]
        elif result_location[val] in [ 'HCMC']:
            dic['SAR'][0] += 1
            dic['SAR'][1] += exac[val]
        elif result_location[val] in ['AR']:
            dic['VAR'][0] += 1
            dic['VAR'][1] += exac[val]
        elif result_location[val] in ['HCMC']:
            dic['cVAR'][0] += 1
            dic['cVAR'][1] += exac[val]
        elif result_location[val] in ['HCMC']:
            continue
        else:
            dic[result_location[val]] = [1, 1]

    dic_res = {}
    for idx in dic:
        if dic[idx][0] >= 50:
            dic_res[idx] = dic[idx]

    label = dic_res.keys()
    values = [0] * len(label)
    for i in range(len(label)):
        values[i] = round(list(dic_res.values())[i][1] / list(dic_res.values())[i][0], 2)

    colors = (0,0,0)
    area = np.pi*3

    plt.scatter(label, values, s = area, c = colors, alpha = 0.5)
    plt.plot(label, values, '.r-') 
    plt.title('created')
    plt.xlabel('authors')
    plt.ylabel('accessions')
    plt.show()

# salary_analyzer(salary)
# location_analyze(location)
loca_salary_analyze(location, salary)
