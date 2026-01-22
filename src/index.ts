import { db } from './db';
import { users } from './schema';

async function main() {
  try {
    await db.insert(users).values({
      name: "Admin Sekolah",
      email: "admin@school.ac.id",
      role: "SUPER_ADMIN",
      provider: "google",
      providerId: "google-oauth-sub-id",
    });

    // Verify insertion
    const result = await db.select().from(users);
    console.log('Successfully queried the database:', result);
  } catch (error) {
    console.error('Error querying the database:', error);
  }
}

main();