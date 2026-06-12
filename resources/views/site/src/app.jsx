// ============================================
// SYNTHERAFLOW COMPLETE APP
// COLE TUDO ISSO NO:
// src/App.jsx
// ============================================

export default function SyntheraFlowApp() {

    // ============================================
    // DADOS MOCKADOS
    // ============================================
  
    const user = {
      name: 'Emily Johnson',
      level: 18,
      xp: 12450,
      streak: 18,
      coins: 3250,
    }
  
    const missions = [
      'Complete 3 quizzes',
      'Teach Lumi a new topic',
      'Win one RaceMind match',
      'Help another student'
    ]
  
    const leaderboard = [
      { name: 'Emily', xp: 12450 },
      { name: 'Sophia', xp: 10900 },
      { name: 'Lucas', xp: 9800 },
    ]
  
    const shopItems = [
      'Cyber Hoodie',
      'Galaxy Wings',
      'Neon Glasses',
      'Magic Crown'
    ]
  
    const quizzes = [
      {
        question: 'What is 5 + 5?',
        options: ['8', '10', '12', '15']
      },
      {
        question: 'Who discovered Brazil?',
        options: [
          'Pedro Álvares Cabral',
          'Einstein',
          'Newton',
          'Tesla'
        ]
      }
    ]
  
    return (
      <div style={{
        background: '#070711',
        color: 'white',
        minHeight: '100vh',
        fontFamily: 'Arial',
        paddingBottom: '100px'
      }}>
  
        {/* HEADER */}
  
        <header style={{
          display: 'flex',
          justifyContent: 'space-between',
          alignItems: 'center',
          padding: '20px 40px',
          borderBottom: '1px solid #222'
        }}>
  
          <h1 style={{
            fontSize: '35px',
            color: '#9b5cff'
          }}>
            SyntheraFlow
          </h1>
  
          <div style={{
            display: 'flex',
            gap: '15px'
          }}>
  
            <button style={buttonStyle}>
              Login
            </button>
  
            <button style={{
              ...buttonStyle,
              background: '#9b5cff'
            }}>
              Sign Up
            </button>
  
          </div>
  
        </header>
  
        {/* HERO */}
  
        <section style={{
          padding: '60px 40px'
        }}>
  
          <h2 style={{
            fontSize: '60px',
            marginBottom: '20px'
          }}>
            Learn. Grow. Thrive. 🚀
          </h2>
  
          <p style={{
            color: '#ccc',
            maxWidth: '700px',
            lineHeight: '35px',
            fontSize: '20px'
          }}>
            SyntheraFlow transforms studying into a magical experience with games,
            quizzes, AI companions and immersive learning worlds.
          </p>
  
        </section>
  
        {/* DASHBOARD */}
  
        <section style={{
          padding: '40px'
        }}>
  
          <h2 style={titleStyle}>
            Dashboard 📊
          </h2>
  
          <div style={gridStyle}>
  
            <div style={cardStyle}>
              <h3>User Profile 👤</h3>
  
              <p>Name: {user.name}</p>
              <p>Level: {user.level}</p>
              <p>XP: {user.xp}</p>
              <p>Coins: {user.coins}</p>
            </div>
  
            <div style={cardStyle}>
              <h3>Daily Missions 🎯</h3>
  
              {missions.map((mission, index) => (
                <div key={index} style={missionStyle}>
                  {mission}
                </div>
              ))}
            </div>
  
            <div style={cardStyle}>
              <h3>Leaderboard 🏆</h3>
  
              {leaderboard.map((player, index) => (
                <div key={index} style={missionStyle}>
                  {index + 1}. {player.name} - {player.xp} XP
                </div>
              ))}
            </div>
  
          </div>
  
        </section>
  
        {/* RACEMIND */}
  
        <section style={{
          padding: '40px'
        }}>
  
          <h2 style={titleStyle}>
            RaceMind 🏎‍🟀
          </h2>
  
          <div style={gridStyle}>
  
            <div style={cardStyle}>
  
              <h3>Race Screen</h3>
  
              <img
                src='https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop'
                style={{
                  width: '100%',
                  borderRadius: '20px',
                  marginTop: '20px'
                }}
              />
  
            </div>
  
            <div style={cardStyle}>
  
              <h3>Quiz Screen ❓</h3>
  
              {quizzes.map((quiz, index) => (
  
                <div
                  key={index}
                  style={{
                    marginTop: '20px'
                  }}
                >
  
                  <h4>{quiz.question}</h4>
  
                  <div style={{
                    display: 'grid',
                    gridTemplateColumns: '1fr 1fr',
                    gap: '10px',
                    marginTop: '15px'
                  }}>
  
                    {quiz.options.map((option, i) => (
  
                      <button
                        key={i}
                        style={{
                          padding: '15px',
                          background: '#9b5cff33',
                          border: 'none',
                          color: 'white',
                          borderRadius: '15px',
                          cursor: 'pointer'
                        }}
                      >
                        {option}
                      </button>
  
                    ))}
  
                  </div>
  
                </div>
  
              ))}
  
            </div>
  
          </div>
  
        </section>
  
        {/* TEACHQUEST */}
  
        <section style={{
          padding: '40px'
        }}>
  
          <h2 style={titleStyle}>
            TeachQuest 👩‍🏫
          </h2>
  
          <div style={gridStyle}>
  
            <div style={cardStyle}>
  
              <h3>Create Lesson</h3>
  
              <textarea
                placeholder='Explain something...'
                style={{
                  width: '100%',
                  height: '150px',
                  marginTop: '20px',
                  background: '#222',
                  color: 'white',
                  border: 'none',
                  borderRadius: '15px',
                  padding: '15px'
                }}
              />
  
            </div>
  
            <div style={cardStyle}>
  
              <h3>Classroom Mode 🏫</h3>
  
              <div style={missionStyle}>
                Math Classroom
              </div>
  
              <div style={missionStyle}>
                Science Classroom
              </div>
  
              <div style={missionStyle}>
                History Classroom
              </div>
  
            </div>
  
          </div>
  
        </section>
  
        {/* LUMI */}
  
        <section style={{
          padding: '40px'
        }}>
  
          <h2 style={titleStyle}>
            Lumi Evolution 🤖
          </h2>
  
          <div style={gridStyle}>
  
            <div style={cardStyle}>
  
              <h3>Lumi Stages</h3>
  
              <div style={missionStyle}>
                👶 Baby Lumi
              </div>
  
              <div style={missionStyle}>
                🌟 Teen Lumi
              </div>
  
              <div style={missionStyle}>
                👑 Master Lumi
              </div>
  
            </div>
  
            <div style={cardStyle}>
  
              <h3>Lumi Pet 🐾</h3>
  
              <div style={missionStyle}>
                🐱 Neon Cat
              </div>
  
              <div style={missionStyle}>
                🐲 Mini Dragon
              </div>
  
              <div style={missionStyle}>
                🦊 Cyber Fox
              </div>
  
            </div>
  
          </div>
  
        </section>
  
        {/* SHOP */}
  
        <section style={{
          padding: '40px'
        }}>
  
          <h2 style={titleStyle}>
            Accessories Shop 🛍️
          </h2>
  
          <div style={gridStyle}>
  
            {shopItems.map((item, index) => (
  
              <div key={index} style={cardStyle}>
  
                <div style={{
                  height: '150px',
                  background: '#9b5cff33',
                  borderRadius: '20px'
                }} />
  
                <h3 style={{
                  marginTop: '20px'
                }}>
                  {item}
                </h3>
  
                <button style={{
                  ...buttonStyle,
                  background: '#9b5cff',
                  marginTop: '20px',
                  width: '100%'
                }}>
                  Buy Item
                </button>
  
              </div>
  
            ))}
  
          </div>
  
        </section>
  
      </div>
    )
  }
  
  // ============================================
  // ESTILOS
  // ============================================
  
  const titleStyle = {
    fontSize: '45px',
    marginBottom: '30px'
  }
  
  const gridStyle = {
    display: 'grid',
    gridTemplateColumns: 'repeat(auto-fit,minmax(300px,1fr))',
    gap: '25px'
  }
  
  const cardStyle = {
    background: '#111122',
    padding: '25px',
    borderRadius: '25px',
    border: '1px solid #222'
  }
  
  const missionStyle = {
    background: '#ffffff10',
    padding: '15px',
    borderRadius: '15px',
    marginTop: '15px'
  }
  
  const buttonStyle = {
    padding: '12px 20px',
    border: 'none',
    borderRadius: '12px',
    color: 'white',
    background: '#222',
    cursor: 'pointer'
  }