import pandas as pd
import numpy as np
import sys
import mysql.connector
import json

def cosine_similarity(u, q):
  A = np.sqrt(np.sum(np.square(u)))
  B = np.sqrt(np.sum(np.square(q)))
  return np.dot(u, q)/(A*B)


if __name__ == "__main__":
    
    conn = mysql.connector.connect(
        host='database-1.cxwksm4igmal.ap-northeast-2.rds.amazonaws.com',
        user='admin',
        password='LEED1955',
        database='Flightdb' 
    )

    cursor = conn.cursor()
    query = "SELECT * FROM recommendationTBL"
    cursor.execute(query)

    recom_list = cursor.fetchall()

    p_111 = sys.argv[1]
    p_11 = sys.argv[2]
    p_1 = sys.argv[3]
    
    keywords = ["adventure", "relaxation", "culture", "foodie", "shopping", "nature", "luxury", "budget_friendly", "photography", "nightlife"]

    user_prefer = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

    user_prefer[keywords.index(p_111)] += 3
    user_prefer[keywords.index(p_11)] += 2
    user_prefer[keywords.index(p_1)] += 1
    
    cities = ["Fukuoka", "Kagoshima", "Kumamoto", "Matsuyama", "Nagoya", "Okinawa", "Osaka", "Sapporo", "Takamatsu", "Tokyo"]
    
    sim_list = []

    for idx, row in enumerate(recom_list):
        row_ = row[1:]
        similarity = cosine_similarity(row_, user_prefer)
        sim_list.append((idx, float(similarity)))
    
    sorted_sim_list = sorted(sim_list, key=lambda x: x[1])
    
    result = {
       '1st': cities[sorted_sim_list[9][0]],
       '2nd': cities[sorted_sim_list[8][0]],
       '3rd': cities[sorted_sim_list[7][0]]
    }

    print(json.dumps(result))
    # print(f'1st: {cities[sorted_sim_list[9][0]]}, 2nd: {cities[sorted_sim_list[8][0]]}, 3rd: {cities[sorted_sim_list[7][0]]}')
    # print('recommendation: ', best_city)

    